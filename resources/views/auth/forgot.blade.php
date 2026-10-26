@extends('layouts.app')
@section('title','Forgot password')
@section('content')
<section class="auth-section">
  <div class="auth-backdrop" aria-hidden="true"></div>
  <div class="auth-box">
    <div class="auth-icon" aria-hidden="true">↗</div>
    <span class="section-kicker">ACCOUNT RECOVERY</span>
    <h1>Reset your password</h1>
    <p>Enter your email and we’ll send recovery instructions if an account exists.</p>
    <form class="auth-form" method="post" action="{{ route('password.email',['locale'=>app()->getLocale()]) }}" >
      @csrf
      <x-auth-field name="email" label="Email address" icon="mail" type="email" placeholder="you@example.com" autocomplete="email" required />
      <div class="auth-form-actions"><button class="button button-primary button-compact auth-submit" type="submit"><svg class="auth-button-icon" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg><span>Send reset link</span></button></div>
    </form>
    <p class="auth-alternate"><a href="{{ route('login',['locale'=>app()->getLocale()]) }}"><svg class="auth-back-icon" viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span>Back to sign in</span></a></p>
  </div>
</section>
@endsection
