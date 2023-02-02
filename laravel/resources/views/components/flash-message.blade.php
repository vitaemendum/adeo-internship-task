@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 30000)"  x-show="show"
         class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green text-black px-48 py-20">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
