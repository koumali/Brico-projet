$(document).ready (function(){
    var $vote=$('#vote');
        $('.vote_like',$vote).click(function(e){
        e.preventDefault();
        vote(1);
    });
    var $vote=$('#vote');
        $('.vote_dislike',$vote).click(function(e){
        e.preventDefault();
        vote(-1);
    });
    function vote(value){
        $.post('likeEmploi.php',{
            ref: $vote.data('ref'),
            ref_id: $vote.data('ref_id'),
            user_id:$vote.data('user_id'),   
            vote: value       
        }).done(function(data, textStatus, jqXHR){
            $('#dislike_count').text(data.count_dislike);
            $('#like_count').text(data.like_count);
            $vote.removeClass('is-liked is-disliked');
            if (value == 1){
                $vote.addClass('is-liked');
            }else{
                $vote.addClass('is-disliked');
            }
            var ratio =Math.round(100 * (data.like_count / (parseInt(data.like_count) + parseInt(data.count_dislike)))); 
            
            $('.vote .vote_bar .vote_progress').css("width",ratio+"%");

        }).fail(function( jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
        });
    }
})