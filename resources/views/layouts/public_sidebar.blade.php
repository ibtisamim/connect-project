<ul class="public_sidebar">
  @foreach ($pages as $one_page)
  <li><a href="{{ route('page.show',[$one_page->id, $one_page->slug])}}" id="privacylink">{{$one_page->title}}</a></li>
  @endforeach
  <li><a href="/contact" id='contactlink'>Contact Us</a></li>
  <li><a href="/support" id="faqlink">FAQ</a></li>
</ul>

