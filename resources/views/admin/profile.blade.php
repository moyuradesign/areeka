@extends('layouts.app')
@section('title','My profile')
@section('crumb','My profile')
@section('content')
<div class="page-heading"><div><span class="eyebrow">ACCOUNT</span><h1>My profile</h1><p>Manage the display name shown across your Areeka workspace.</p></div></div>
<div class="areeka-profile-grid">
<section class="panel areeka-profile-card">
    <div class="areeka-profile-heading"><span class="areeka-profile-avatar"><x-ui-icon name="user-round" :size="26" /></span><div><h2>{{ $profile->name }}</h2><p>{{ $profile->role?->name ?? 'Team member' }}</p></div></div>
    <form method="post" action="{{ route('dashboard.profile.update',['locale'=>app()->getLocale()]) }}" class="areeka-profile-form">
        @csrf @method('PATCH')
        <label class="field" for="areeka-profile-name"><span>Display name</span><input class="field-input" id="areeka-profile-name" name="name" type="text" required minlength="2" maxlength="120" autocomplete="name" value="{{ old('name', $profile->name) }}" /></label>
        @error('name')<p class="areeka-profile-error" role="alert">{{ $message }}</p>@enderror
        <label class="field" for="areeka-profile-email"><span>Email address</span><input class="field-input" id="areeka-profile-email" type="email" value="{{ $profile->email }}" readonly aria-describedby="areeka-profile-email-note" /></label>
        <p id="areeka-profile-email-note" class="areeka-profile-note">Your email address is managed separately from your public display name.</p>
        <div class="areeka-profile-actions"><button type="submit" class="button button-primary"><x-ui-icon name="shield-check" :size="17" />Save changes</button></div>
    </form>
</section>
</div>
@endsection
