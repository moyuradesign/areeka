@extends('layouts.app')
@section('title','New password')
@section('content')
<section class="auth-section">
  <div class="auth-backdrop" aria-hidden="true"></div>
  <div class="auth-box">
    <div class="auth-icon" aria-hidden="true">✦</div>
    <span class="section-kicker">ACCOUNT RECOVERY</span>
    <h1>Choose a new password</h1>
    <p>Use at least 12 characters with a mix of letters and numbers.</p>
    <form class="auth-form" method="post" action="{{ route('password.update',['locale'=>app()->getLocale()]) }}" >
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <x-auth-field name="email" label="Email address" icon="mail" type="email" placeholder="you@example.com" :value="request('email')" autocomplete="email" required />
      <x-auth-field name="password" label="New password" icon="lock" type="password" placeholder="At least 12 characters" autocomplete="new-password" required minlength="12" />
      <x-auth-field name="password_confirmation" label="Confirm password" icon="shield" type="password" placeholder="Re-enter password" autocomplete="new-password" required minlength="12" />
      <div class="auth-form-actions"><button class="button button-primary button-compact auth-submit" type="submit"><svg class="auth-button-icon" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="7.5" cy="15.5" r="5.5"/><path d="m21 2-9.6 9.6"/><path d="m15.5 7.5 3 3"/><path d="m18.5 4.5 3 3"/></svg><span>Update password</span></button></div>
    </form>
    
  </div>
</section>
@endsection
