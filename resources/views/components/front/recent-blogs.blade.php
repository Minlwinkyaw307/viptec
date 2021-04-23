
<div class="blog-filter hidden lg:block lg:w-1/3 xl:w-2/6">
    <div class="most-read">
        <ul>
            @foreach($blogs as $blog)
            <li>
                <div class="blog-filter-box sm:flex">
                    <a class="block flex-shrink-0" href="{{ localized_route('front.blog.detail', ['slug' => $blog->translations[0]->slug]) }}">
                        <img src="{{ $blog->thumbnailUrl }}" alt="{{ $blog->translations[0]->title }}">
                    </a>
                    <div class="blog-filter-box-text">
                        <div class="blog-filter-box-top md:flex">
                            <a href="{{ localized_route('front.blog.detail', ['slug' => $blog->translations[0]->slug]) }}" class="block">{{ __('Blog') }}</a>
                        </div>
                        <span class="block">
                                          <a href="{{ localized_route('front.blog.detail', ['slug' => $blog->translations[0]->slug]) }}" class="block truncate">
                                             {{ $blog->translations[0]->title }}
                                          </a>
                                       </span>
                        <time class="block">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</time>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
