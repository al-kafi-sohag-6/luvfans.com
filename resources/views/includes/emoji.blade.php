{{-- Must add class 'parent' to parent div --}}

    <div class="custom-scrollbar {{ $extra_class??'' }} dropdown-menu" aria-labelledby="{{ $target }}" style="z-index: 9999999;right: 25%;max-height: none;box-shadow: rgba(0, 0, 0, 0.5) 0px 5px 50px 0px; top: 0px;width: 23rem;" id="emoji-dropdown">
        <emoji-picker @if(auth()->user()->dark_mode == 'off') class="light emoji-div" @else class="dark emoji-div" @endif style="margin: 0px auto;"></emoji-picker>
    </div>


