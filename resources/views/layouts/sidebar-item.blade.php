@if(isset($item) && isset($item['url']) && !empty($item['url']) && !isset($item['items']))
    <div class="menu-item">
        <a class="menu-link" href="{{ $item['url'] }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">{{ $item['name'] }}</span>
        </a>
    </div>
@endif

@if(isset($item) && isset($item['items']) && is_array($item['items']))
    @php(print_r($item['items']))
    <div class="menu-sub menu-sub-dropdown w-225px w-lg-250px px-1 py-4">
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ $item['name'] }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    @foreach($item['items'] as $sub)
                        @if(isset($sub['items']) && is_array($sub['items']))
                            @include('layouts.sidebar-item', ['item' => $sub])
                        @else
                            <a class="menu-link" href="{{ url($sub->url) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ $sub->name }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
