{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

<h1>Menbers</h1>

<h2>Pro</h2>
    @foreach ($profiles as $profile)
        @if($profile->card_rank === 'Pro')
            <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-12 w-12">
            
        @endif
    @endforeach

<h2>DM</h2>
    @foreach ($profiles as $profile)
        @if($profile->card_rank === 'DM')
            <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-12 w-12">
            <div>{{ $profile->user->name }}</div>
            <div>ダイブ本数:{{ $profile->dive_count }}</div>
        @endif
    @endforeach

<h2>MSD</h2>
    @foreach ($profiles as $profile)
        @if($profile->card_rank === 'MSD')
            <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-12 w-12">
            <div>{{ $profile->user->name }}</div>
            <div>ダイブ本数:{{ $profile->dive_count }}</div>
        @endif
    @endforeach

<h2>AOW</h2>
    @foreach ($profiles as $profile)
        @if($profile->card_rank === 'AOW')
            <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-12 w-12">
            <div>{{ $profile->user->name }}</div>
            <div>ダイブ本数:{{ $profile->dive_count }}</div>
        @endif
    @endforeach

<h2>OW</h2>
    @foreach ($profiles as $profile)
        @if($profile->card_rank === 'OW')
            <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-12 w-12">
            <div>{{ $profile->user->name }}</div>
            <div>ダイブ本数:{{ $profile->dive_count }}</div>
        @endif
    @endforeach

{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
