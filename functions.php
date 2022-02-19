<?php


function create_pokedex_pages(){
    // $pages_array[]=array('title'=>'test', 'name'=>'name_test', 'parent'=>'');
    // foreach($pages_array as $value){
    //     setting_pages($value);
    // }
    $url="/pokedex";
    $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/pokedex.json');
    $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $pokedex_json=json_decode($pokedex_file, true);

    for($i=0;$i<3;$i++){
        $pages_array=array('title'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'name'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'parent'=>'pokedex');
        setting_pages($pages_array);
    }
}

function setting_pages($val){
    if(!empty($val['parent'])){
        $parent_id=get_page_by_path($val['parent']);
        $parent_id=$parent_id->ID;
        $page_slug=$val['parent']."/".$val['name'];
    }else{
        $parent_id="";
        $page_slug=$val['name'];
    }

    if(empty(get_page_by_path($page_slug))){
        $page_name=$val['name'];
        $insert_id=wp_insert_post(
            array(
                'post_title'    =>$val['title'],
                'post_name'     =>$page_name,
                'post_status'   =>'publish',
                'post_type'     =>'page',
                'post_parent'   =>$parent_id,
                'post_content'  =>'',
            )
        );
    }else{
        $page_obj=get_page_by_path($page_slug);
        $page_id=$page_obj->ID;
        $page_name=$val['name'];
        $base_post=array(
            'ID'        =>$page_id,
            'post_title'=>$val['title'],
            'post_name' =>$page_name,
        );
        wp_update_post($base_post);
    }
}

if(isset($_POST['run'])){
    create_pokedex_pages();
}

// add_action('admin_menu', 'create_pokedex_pages');
// https://jajaaan.co.jp/wordpress/wordpress-admin-page/
add_action('admin_menu', 'custom_menu_page');
function custom_menu_page()
{
  add_menu_page('データセット', 'データセット', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-admin-generic', 4);
}
function add_custom_menu_page()
{
    $pokedex=array('status'=>false, 'version'=>'', 'update'=>'');
    $description=array('status'=>false, 'version'=>'', 'update'=>'');
    $type=array('status'=>false, 'version'=>'', 'update'=>'');

    if(!file_exists(get_template_directory().'/pokedex'))
    {
?>
<div class="wrap">
    <h2>データセット状態</h2>
    <div class="metabox-holder">
        <div class="postbox ">
            <h3 class='hndle'><span>Pokedex</span></h3>
            <div class="inside">
                <div class="main">
                    <h4>Pokedexフォルダがありません</h4>
                    <p class="setting_description">Githubから最新のPokedexをダウンロードしてテーマフォルダ直下に入れてください。</p>
                    <a href="https://github.com/towakey/pokedex">https://github.com/towakey/pokedex</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    else
    {
        $url="/pokedex";
        if(file_exists(get_template_directory().$url.'/pokedex/pokedex.json'))
        {
            $pokedex['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/pokedex.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $pokedex['version']=$pokedex_json['version'];
            $pokedex['update']=$pokedex_json['update'];
        }
        if(file_exists(get_template_directory().$url.'/pokedex/description.json'))
        {
            $description['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/description.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $description['version']=$pokedex_json['version'];
            $description['update']=$pokedex_json['update'];
        }
        if(file_exists(get_template_directory().$url.'/type/type.json'))
        {
            $type['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/type/type.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $type['version']=$pokedex_json['version'];
            $type['update']=$pokedex_json['update'];
        }
    // var_dump(get_template_directory()."/pokedex/pokedex.json");
    // var_dump(file_exists(get_template_directory()."/pokedex/pokedex.json"));
?>
<div class="wrap">
    <h2>データセット状態</h2>
    <div class="metabox-holder">
        <div class="postbox ">
            <form action="" method="post">
                <button type="submit" name="run">実行</button>
            </form>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>Pokedex.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">ポケモン図鑑のメインデータセット</p>
                    <?php
                    if($pokedex['status']){
                        echo "<h4>version:".$pokedex['version']."</h4>";
                        echo "<h4>update:".$pokedex['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>description.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">ポケモン図鑑の説明文データセット</p>
                    <?php
                    if($description['status']){
                        echo "<h4>version:".$description['version']."</h4>";
                        echo "<h4>update:".$description['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>type.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">タイプ相性データセット</p>
                    <?php
                    if($description['status']){
                        echo "<h4>version:".$type['version']."</h4>";
                        echo "<h4>update:".$type['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
