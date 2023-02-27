							@foreach ($comments as $comment)
									<li>
										<div class="comment-wrapper">
										@php
										$url = Storage::disk('public')->url('users/default.png');
										if (!is_null($comment->user)){
											$name = $comment->user->name;
											if ($comment->user->avatar) $url = Storage::disk('public')->url('users/source/'.$comment->user->avatar);
										}
										else{
											$name = $comment->name;
										}
										@endphp
											<div class="comment-author"><img src="{{ $url }}" alt="{{ $url }}"> {{ $name }}</div>
											<p>{{ $comment->text }}</p>
											<!-- Comment Controls -->
											<div class="comment-actions">
												<span class="comment-date">{{ $comment->created_at->format('F d, Y H:i') }}</span>
												<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Vote Up" data-action="{{ route('comments.like', ['comment' => $comment->id]) }}" class="show-tooltip comment-like"><i class="glyphicon glyphicon-thumbs-up"></i> up</a>
												<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Vote Down" data-action="{{ route('comments.dizlike', ['comment' => $comment->id]) }}" class="show-tooltip comment-dizlike"><i class="glyphicon glyphicon-thumbs-down"></i> down</a>
												@php
												$amount = $comment->getAmount();
													$symbol = '';
													$class = 'success';
												if ($amount > 0){
													$class = 'success';
													$symbol = '+';
												}
												elseif ($amount < 0){
													$class = 'danger';
													$symbol = '-';
												}
												@endphp
												<span id="amount_{{ $comment->id }}" class="amount label label-{{ $class }}">{{ $symbol.$amount }}</span>
												<a href="javascript:void(0)" class="btn btn-micro btn-grey comment-reply-btn" data-comment_id="{{ $comment->id }}"><i class="glyphicon glyphicon-share-alt"></i>{{ __('comments/pages.reply') }}</a>
											</div>
										</div>
									</li>
									@if ($comment->childrenComments)
										<li>
									<ul>
																	@include('posts.comment', ['comments' => $comment->childrenComments])
</ul>
</li>
									@endif
									@endforeach