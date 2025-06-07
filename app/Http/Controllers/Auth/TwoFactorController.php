<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    /**
     * Show the 2FA setup page.
     *
     * @return \Illuminate\View\View
     */
    public function showSetupForm()
    {
        $user = Auth::user();
        
        if (!$user->two_factor_enabled) {
            return redirect()->route('profile.edit');
        }
        
        // In a real app, we would generate a QR code for scanning
        // For this demo, we'll just show the secret for simulation
        $secret = $user->two_factor_secret ?? bin2hex(random_bytes(16));
        
        if (!$user->two_factor_secret) {
            $user->two_factor_secret = $secret;
            $user->save();
        }
        
        return view('auth.2fa.setup', ['secret' => $secret]);
    }

    /**
     * Show the 2FA verification page.
     *
     * @return \Illuminate\View\View
     */
    public function showVerifyForm()
    {
        if (!session()->has('auth.2fa.user_id')) {
            return redirect()->route('login');
        }
        
        $userId = session('auth.2fa.user_id');
        $user = User::findOrFail($userId);
        
        return view('auth.2fa.verify', ['email' => $user->email]);
    }

    /**
     * Verify the 2FA code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'size:6'],
        ]);
        
        if (!session()->has('auth.2fa.user_id')) {
            return redirect()->route('login');
        }
        
        $userId = session('auth.2fa.user_id');
        $user = User::findOrFail($userId);
        
        // In a real app, we would verify the OTP against the secret
        // For this demo, we'll accept any 6-digit code for simulation
        $validCode = true;
        
        if ($validCode) {
            Auth::login($user);
            
            $request->session()->forget(['auth.2fa.user_id', 'auth.2fa.remember']);
            
            $intendedUrl = session('auth.2fa.intended_url', route('dashboard'));
            session()->forget('auth.2fa.intended_url');
            
            return redirect()->to($intendedUrl);
        }
        
        return back()->withErrors([
            'code' => 'The provided code is invalid.',
        ]);
    }

    /**
     * Enable 2FA for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable(Request $request)
    {
        $user = Auth::user();
        $user->two_factor_enabled = true;
        $user->two_factor_secret = bin2hex(random_bytes(16)); // For simulation
        $user->save();
        
        return redirect()->route('auth.2fa.setup');
    }

    /**
     * Disable 2FA for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable(Request $request)
    {
        $user = Auth::user();
        $user->two_factor_enabled = false;
        $user->two_factor_secret = null;
        $user->save();
        
        return redirect()->route('profile.edit')->with('status', 'Two-factor authentication has been disabled.');
    }
}