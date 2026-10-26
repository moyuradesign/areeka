@extends('layouts.app')
@section('title','Create account')
@section('content')
<section class="auth-section">
  <div class="auth-backdrop" aria-hidden="true"></div>
  <div class="auth-box">
    <div class="auth-icon" aria-hidden="true">✦</div>
    <span class="section-kicker">JOIN THE WORKSPACE</span>
    <h1>Create your account</h1>
    <p>Get started with a secure, personal customer portal.</p>
    <form class="auth-form" method="post" action="{{ route('register.perform',['locale'=>app()->getLocale()]) }}" >
      @csrf
      <x-auth-field name="name" label="Full name" icon="user" type="text" placeholder="Your full name" autocomplete="name" required maxlength="120" />
      <x-auth-field name="email" label="Email address" icon="mail" type="email" placeholder="name@company.com" autocomplete="email" required />
      <x-auth-field name="password" label="Password" icon="lock" type="password" placeholder="At least 12 characters" autocomplete="new-password" required minlength="12" />
      <x-auth-field name="password_confirmation" label="Confirm password" icon="shield" type="password" placeholder="Re-enter password" autocomplete="new-password" required minlength="12" />
      <div class="auth-form-actions"><button class="button button-primary button-compact auth-submit" type="submit"><svg class="auth-button-icon" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6m-3-3h6"/></svg><span>Create account</span></button></div>
    </form>
    <p class="auth-alternate">Already registered? <a href="{{ route('login',['locale'=>app()->getLocale()]) }}">Sign in</a></p>
  </div>
</section>
@endsection
