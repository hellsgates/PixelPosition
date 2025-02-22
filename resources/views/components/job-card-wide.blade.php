@props(['job'])

<div class="p-4 bg-white/5 rounded-xl flex gap-x-6 mt-4 border border-transparent hover:border-blue-800 group transition-colors duration-1000">

    <div>
        <x-employer-logo :employer="$job->employer" :width="90"/>
    </div>

    <div class="flex-1">
        <a class="self-start text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h4 class="font-bold text-lg group-hover:text-blue-600 transition-colors duration-500">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h4>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->salary }}</p>
    </div>

        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag/>
            @endforeach
        </div>
</div>
