function search(){
    var name = $('#name_search').val();
    var json = {
        'name': name
    };
    var path = "/search_someone";

    $.post(path, json, function (retour) {
        $('#result_search_people').html(JSON.parse(retour))
    });
}

function  load(id,id_category) {

    if (id != old_select) {
        old_select = id;

        refresh_tree(id_category, cpt);

        var json = {
            'id': id,
            'cpt': cpt
        };

        var path = "/load_other_section";

        $.post(path, json, function (retour) {

            if (JSON.parse(retour) != "none") {
                let old = $('#container_all').html();
                $('#container_all').html(old + JSON.parse(retour));
                cpt = cpt + 1;
            }
        });
    }
}

function refresh_tree(id_category,end){
    let i = id_category+1;
    let u = end + 1;

    for (i;i<u;i++){
        $('#item'+i).remove();
        $('#icon_arrow_'+i).remove();
    }

    cpt= id_category + 1;
}


function activated_item(item_actived,val){
    var children = $('#item'+val).children( ".link" );
    console.log(children.length);
   for (let i = 0;i<children.length;i++){
       $(children[i]).children('div').addClass('no_actived');
   }
   $(item_actived).children('div').removeClass('no_actived');
}

function openMenu() {
    $('#menu_mobile').css({
        'width': '320px',
        'padding':'0 50px'
    });
}

function closeMenu() {
    $('#menu_mobile').css({
        'width': '0px',
        'padding':'0px'
    });
}