<?php
use WebServer\Classes\DataBase;

$db = new DataBase\dbconn();

$sortBy = 'id';
$sortAsc = 'asc';
if(isset($_SESSION['sort']['by']))
    $sortBy = $_SESSION['sort']['by'];
if(isset($_SESSION['sort']['asc']))
    $sortAsc = $_SESSION['sort']['asc'];

$sort = $db->checkSort($sortBy, $sortAsc);

if(empty($_SESSION['nav']))
    $_SESSION['nav'] = 0;



?>

<div class="task-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <p><a class="sort-button" href="#" data-by="id" data-asc="<?=($sort['sortAsc']=='ASC') ? 'DESC' : 'ASC'?>">ID<?if($sort['sortBy']=='id'){echo ($sort['sortAsc']=='ASC' ? ' &#8593;' : ' &#8595;');} ?></a></p>
            </div>
            <div class="col-lg-2">
                <p><a class="sort-button" href="#" data-by="user_name" data-asc="<?=($sort['sortAsc']=='ASC') ? 'DESC' : 'ASC'?>">Имя пользователя<?if($sort['sortBy']=='user_name'){echo ($sort['sortAsc']=='ASC' ? ' &#8593;' : ' &#8595;');} ?></a></p>
            </div>
            <div class="col-lg-2">
                <p><a class="sort-button" href="#" data-by="user_email" data-asc="<?=($sort['sortAsc']=='ASC') ? 'DESC' : 'ASC'?>">email<?if($sort['sortBy']=='user_email'){echo ($sort['sortAsc']=='ASC' ? ' &#8593;' : ' &#8595;');} ?></a></p>
            </div>
            <div class="col-lg-5">
                <p><a class="sort-button" href="#" data-by="text" data-asc="<?=($sort['sortAsc']=='ASC') ? 'DESC' : 'ASC'?>">Текст задачи<?if($sort['sortBy']=='text'){echo ($sort['sortAsc']=='ASC' ? ' &#8593;' : ' &#8595;');} ?></a></p>
            </div>
            <div class="col-lg-2">
                <p><a class="sort-button" href="#" data-by="performed" data-asc="<?=($sort['sortAsc']=='ASC') ? 'DESC' : 'ASC'?>">Статус<?if($sort['sortBy']=='performed'){echo ($sort['sortAsc']=='ASC' ? ' &#8593;' : ' &#8595;');} ?></a></p>
            </div>
        </div>
        <?$tasksList = $db->getList('tasks', $sort['sortBy'], $sort['sortAsc']);

        $i = $_SESSION['nav'];
        if($_SESSION['nav']+2 < count($tasksList))
            $limit = $_SESSION['nav']+2;
        else
            $limit = count($tasksList)-1;


        while($i <= $limit):
            $item = $tasksList[$i]?>
            <div class="row task-item" data-task-id="<?=$item['id']?>">
                <div class="col-lg-1 task-id">
                    <p><?=$item['id']?></p>
                </div>
                <div class="col-lg-2 task-user-name">
                    <p><?=strip_tags($item['user_name'])?></p>
                </div>
                <div class="col-lg-2 task-user-email">
                    <p><?=strip_tags($item['user_email'])?></p>
                </div>
                <div class="col-lg-5 task-text">
                    <p><?=strip_tags($item['text'])?></p>
                </div>
                <div class="col-lg-2 task-performed">
                    <?if($item['performed']==1):?>
                        <p>Выполнено</p>
                    <?endif;?>
                    <?if($item['edited']==1):?>
                        <i class="edit-admin" title="Отредактировано Администратором">&#10004;</i>
                    <?endif;?>
                    <?if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'):?>
                        <a class="edit-text" href="#js-modal-edit-task" data-toggle="modal" data-target="#js-modal-edit-task" data-id="<?=$item['id']?>"><i>&#9998;</i></a>
                    <?endif;?>
                </div>
            </div>
        <?$i++;
        endwhile;?>
            <div class="row nav-string">
                <div class="col-lg-12">
                    <p>Навигация по страницам:
                    <?$navList = ceil(count($tasksList)/3-1);
                    $current = ($_SESSION['nav']/3);
                    for ($i = 0; $i <= $navList; $i++):?>
                        <?if($current != $i):?>
                            <a class="nav-button" href="#" data-nav="<?=$i?>>"><?=$i+1?></a>
                        <?else:?>
                            <a><?=$i+1?></a>
                        <?endif;?>
                    <?endfor;?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    require ('modul/modal/editTask.php');
}?>
