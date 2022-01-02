{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

{{-- メンバーのカードランクとダイブ本数の一覧 --}}

<h2>Pro</h2>
    @forelse ($pro as $x)
            <img src="{{ Storage::url($x->profile_image) }}" class="rounded-full h-12 w-12">
    @empty
        <p>メンバーがいません</p>
    @endforelse

<h2>DM</h2>
    @forelse ($dm as $x)
            <img src="{{ Storage::url($x->profile_image) }}" class="rounded-full h-12 w-12">
            <div>{{ $x->user->name }}</div>
            <div>ダイブ本数:{{ $x->dive_count }}</div>
    @empty
        <p>メンバーがいません</p>
    @endforelse

<h2>MSD</h2>
    @forelse ($msd as $x)
        <img src="{{ Storage::url($x->profile_image) }}" class="rounded-full h-12 w-12">
        <div>{{ $x->user->name }}</div>
        <div>ダイブ本数:{{ $x->dive_count }}</div>
    @empty
        <p>メンバーがいません</p>
    @endforelse

<h2>AOW</h2>
    @forelse ($aow as $x)
        <img src="{{ Storage::url($x->profile_image) }}" class="rounded-full h-12 w-12">
        <div>{{ $x->user->name }}</div>
        <div>ダイブ本数:{{ $x->dive_count }}</div>
    @empty
        <p>メンバーがいません</p>
    @endforelse

<h2>OW</h2>
    @forelse($ow as $x)
        <img src="{{ Storage::url($x->profile_image) }}" class="rounded-full h-12 w-12">
        <div>{{ $x->user->name }}</div>
        <div>ダイブ本数:{{ $x->dive_count }}</div>
    @empty
        <p>メンバーがいません</p>
    @endforelse

{{-- メンバーのカードランクとダイブ本数の一覧ここまで --}}

{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
