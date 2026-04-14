@php
  $categoryLabels = [
    'psychology' => 'علم النفس',
    'addiction' => 'الإدمان',
    'relationships' => 'العلاقات', 
    'self_development' => 'التطوير الذاتي',
    'family' => 'الأسرة والطفل'
  ];
@endphp

<div class="bk" data-sr="up" data-sr-d="{{ ($idx % 3) + 1 }}">
  <div class="bk-img">
    @if($book->cover_image)
      <img src="{{ asset('storage/'.$book->cover_image) }}" alt="{{ $book->title }}">
    @else
      <div class="bk-ph">
        <i class="bi bi-book-fill"></i>
      </div>
    @endif

    <div class="bk-overlay">
      <a href="{{ route('books.show', $book->slug ?? $book->id) }}" class="ov-btn ov-read">
        <i class="bi bi-book-half"></i> قراءة
      </a>
      @if($book->pdf_file)
      <a href="{{ route('books.download', $book->slug ?? $book->id) }}" class="ov-btn ov-dl">
        <i class="bi bi-download"></i> تحميل
      </a>
      @endif
    </div>

    @if($book->category)
      <span class="bk-badge bk-cat-b">{{ $categoryLabels[$book->category] ?? $book->category }}</span>
    @endif
    <span class="bk-badge bk-lang-b">{{ $book->language === 'ar' ? 'عربي' : 'EN' }}</span>
    @if($book->pages)
      <span class="bk-badge bk-pg-b"><i class="bi bi-file-text"></i> {{ $book->pages }} ص</span>
    @endif
  </div>

  <div class="bk-body">
    <div class="bk-title">{{ $book->title }}</div>
    <div class="bk-auth">
      <i class="bi bi-person-fill"></i>
      {{ $book->author_name }}
    </div>

    @if($book->description)
    <div class="bk-desc">
      {{ $book->description }}
    </div>
    @endif

    <div class="bk-foot">
      <div class="bk-stats">
        <span class="bk-stat"><i class="bi bi-eye"></i> {{ number_format($book->views ?? 0) }}</span>
        <span class="bk-stat"><i class="bi bi-download"></i> {{ number_format($book->download_count ?? 0) }}</span>
      </div>
      <a href="{{ route('books.show', $book->slug ?? $book->id) }}" class="bk-read">
        قراءة
      </a>
    </div>
  </div>
</div>
