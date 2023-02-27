jQuery(document).ready(function($){
	$(".post-comments").on('click', '.comment-reply-btn', replyComment);
		$(".post-comments").on('click', '.comment-like', likeComment);
				$(".post-comments").on('click', '.comment-dizlike', dizlikeComment);
$(".pagination-wrapper").on('click', '.page-link', paginateComments);
		
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$('#test').text("work script");
});

function replyComment(){
	var id = $(this).attr("data-comment_id");
	$('#comment_parent').val(id);
$('.comment-form').attr("tabindex", 1);
$('.comment-form').focus();

	$('#test').text("id "+id);
}
function likeComment(){
		var action = $(this).attr("data-action");
		makeVote(action);
}
function dizlikeComment(){
		var action = $(this).attr("data-action");
		makeVote(action);
}
function makeVote(action){
        $.ajax({
            url: action,
            type: 'GET',
			cache: false,
            dataType: 'JSON',
            success: function(data) {
				if (data.status == 'success'){
					var symbol = '';
					if(data.data > 0){
						$('#amount_'+data.id).removeClass('label-success');
												$('#amount_'+data.id).removeClass('label-remove');
																		$('#amount_'+data.id).addClass('label-success');
						symbol = '+';
					}
					else if(data.data < 0){
												$('#amount_'+data.id).removeClass('label-success');
												$('#amount_'+data.id).removeClass('label-remove');
																		$('#amount_'+data.id).addClass('label-danger');
						symbol = '-';
					}
					else{
												$('#amount_'+data.id).removeClass('label-success');
												$('#amount_'+data.id).removeClass('label-remove');
																		$('#amount_'+data.id).addClass('label-success');
					}
					$('#amount_'+data.id).text(symbol+data.data);
				}
            }
        });
}
function paginateComments()
{
	var url = $(this).attr("data-page");
	        $.ajax({
            url: url,
            type: 'GET',
			cache: false,
            dataType: 'JSON',
            success: function(data) {
				if (data.status == 'success'){
	$(".post-comments").html(data.data);
	$(".pagination-wrapper").html(data.pagination);
				}
			}
			});
}