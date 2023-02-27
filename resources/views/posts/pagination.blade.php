																	@if ($comments->lastPage() > 1)
									<ul class="pagination pagination-sm">
								@if ($comments->currentPage() > 1)
										<li class="disabled"><a class="page-link" data-page="{{ route('comments.index', ['page' => ($comments->currentPage() -1), 'post_id' => $post->id]) }}" href="javascript:void(0)">{{ __('comments/pages.previous') }}</a></li>
									@endif
									@for ($i = 1; $i <= $comments->lastPage(); $i++)
										@if ($comments->currentPage() == $i)
										<li class="active"><a href="javascript:void(0)">{{ $i }}</a></li>
									@else
										<li><a class="page-link" data-page="{{ route('comments.index', ['page' => $i, 'post_id' => $post->id]) }}" href="javascript:void(0)">{{ $i }}</a></li>
									@endif
									@endfor
									@if ($comments->currentPage() < $comments->lastPage())
										<li><a class="page-link" data-page="{{ route('comments.index', ['page' => ($comments->currentPage() + 1), 'post_id' => $post->id]) }}" href="javascript:void(0)">{{ __('comments/pages.next') }}</a></li>
									@endif
									</ul>
									@endif