var gc_admin_utility = {
    getParameterByName: function(name) {
        name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regexS = "[\\?&]" + name + "=([^&#]*)";
        var regex = new RegExp(regexS);
        var results = regex.exec(window.location.search);
        if(results == null)
            return "";
        else
            return decodeURIComponent(results[1].replace(/\+/g, " "));
    }


};

jQuery(document).ready(function($) {

    $('#update-categories').submit(function(e){
        e.preventDefault();

        var category_ids = $('#category_ids');
        var platinum_plus = $('#platinum_plus_member_ws_wholesale_discount');
        var platinum  = $('#platinum_member_ws_wholesale_discount');
        var gold  = $('#gold_member_ws_wholesale_discount');
        var silver  = $('#silver_member_ws_wholesale_discount');
        var promotion_name = $('#promotion_name');

        var category_ids_val = category_ids.val();
        var platinum_plus_val = platinum_plus.val();
        var platinum_val = platinum.val();
        var gold_val = gold.val();
        var silver_val = silver.val();
        var promotion_name_val = promotion_name.val();

        localStorage.setItem("category_ids", category_ids_val);
        localStorage.setItem("platinum_plus", platinum_plus_val);
        localStorage.setItem("platinum", platinum_val);
        localStorage.setItem("gold", gold_val );
        localStorage.setItem("silver",  silver_val);
        localStorage.setItem("promotion_name",  promotion_name_val);

        var idsArray = category_ids_val.split(",");

        var wp_edit = '/wp-admin/term.php?taxonomy=product_cat&tag_ID=' + idsArray[0] + '&post_type=product&gc_update=1';

        setTimeout(function () {
            window.location.href = wp_edit ;
        }, 600);



    });


    productCat = $('body.taxonomy-product_cat');
    gcUpdate = gc_admin_utility.getParameterByName('gc_update');
    gcNext = gc_admin_utility.getParameterByName('gc_next');
    tagId = gc_admin_utility.getParameterByName('tag_ID');

    if (productCat.length && gcUpdate == 1) {

        var ids = localStorage.getItem("category_ids");
        var platinumPlus = localStorage.getItem("platinum_plus");
        var platinum = localStorage.getItem("platinum");
        var gold = localStorage.getItem("gold");
        var silver = localStorage.getItem("silver");
        var promotion_name = localStorage.getItem("promotion_name");

        var success = $('.notice.notice-success');


        setTimeout(function () {

            $('.platinum_plus_member_ws_wholesale_discount').val(platinumPlus);
            $('.platinum_member_ws_wholesale_discount').val(platinum);
            $('.gold_member_ws_wholesale_discount').val(gold);
            $('.silver_member_ws_wholesale_discount').val(silver);

            var promotionName = $('tr[data-name="promotion_name"]').find('input');

            promotionName.val(promotion_name);



        }, 300);


        var idsArray = ids.split(",");
        var tagIdPos = idsArray.indexOf(tagId);
        var nextIdPos = tagIdPos + 1;
        var nextId = idsArray[nextIdPos];
        var arrayLength = idsArray.length;


        if (success.length) {

            setTimeout(function () {
                var wp_edit = '/wp-admin/term.php?taxonomy=product_cat&tag_ID=' + nextId + '&post_type=product&gc_update=1&gc_next=1';

                if (typeof(nextId) != "undefined"){
                    window.location.href = wp_edit ;      // go to next page
                } else {
                    $('h1').text('Categories updated with Wholesale Pricing');

                    localStorage.removeItem("category_ids");
                    localStorage.removeItem("platinum_plus");
                    localStorage.removeItem("platinum");
                    localStorage.removeItem("gold");
                    localStorage.removeItem("silver");
                    localStorage.removeItem("promotion_name");

                }



            }, 1000);

        } else if (gcNext == 1) { // load next page

            setTimeout(function () {
                $('#edittag').submit();

            }, 1000);

        } else {

            setTimeout(function () {
                $('#edittag').submit();

            }, 1000);

        }


    }


});