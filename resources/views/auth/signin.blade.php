@extends('layouts.app')
@section('title','Sign in')
@section('content')
<section class="auth-section">
  <div class="auth-backdrop" aria-hidden="true"></div>
  <div class="auth-box">
    <div class="auth-icon" aria-hidden="true">✦</div>
    <span class="section-kicker">WELCOME BACK</span>
    <h1>Sign in to Areeka</h1>
    <p>Everything your business needs, beautifully connected.</p>
    <form class="auth-form" method="post" action="{{ route('login.perform',['locale'=>app()->getLocale()]) }}" >
      @csrf
      <x-auth-field name="email" label="Email address" icon="mail" type="email" placeholder="name@company.com" autocomplete="email" required autofocus />
      <x-auth-field name="password" label="Password" icon="lock" type="password" placeholder="Enter your password" autocomplete="current-password" required />
      <div class="auth-options"><label class="checkline"><input type="checkbox" name="remember" value="1"> Remember me</label><a href="{{ route('password.request',['locale'=>app()->getLocale()]) }}">Forgot password?</a></div>
      <div class="auth-form-actions"><button class="button button-primary button-compact auth-submit" type="submit"><svg class="auth-button-icon" viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m10 17 5-5-5-5"/><path d="M15 12H3"/><path d="M12 3h6a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3h-6"/></svg><span>Sign in</span></button></div>
    </form>
    <p class="auth-alternate">New to Areeka? <a href="{{ route('register',['locale'=>app()->getLocale()]) }}">Create an account</a></p>
  </div>
</section>
@endsection
