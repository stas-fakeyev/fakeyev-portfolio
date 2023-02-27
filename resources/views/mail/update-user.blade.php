@extends('layout.email')

@section('content')
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<p>{{ $mailHeader }}</p>
<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
<p>{{ $mailMessage }}</p>
<p>{{ __('users/mail.your-login') }}: {{ $user->login }}</p>
<p>{{ __('users/mail.your-name') }}: {{ $user->name }}</p>
<p>{{ __('users/mail.your-email') }}: {{ $user->email }}</p>
<p>{{ __('users/mail.your-role') }}: {{ __('users/form.'.$user->role->name) }}</p>
</td>
</tr>
</table>
</td>
</tr>
<p>{{ $mailFooter }}</p>
<p>{{ config('app.name') }}</p>
</table>
</td>
</tr>
</table>
@endsection