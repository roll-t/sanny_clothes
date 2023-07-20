
<div class="title">Nhóm Danh mục</div>
<form action="<?php echo _WEB_ROOT?>/adm/category/addCategory" method="post" onsubmit = "return false" class ='post-data-categoty'>
    <div class="menu-category">
        <?php 
        foreach($catalogList as $key=>$category){
        echo '<div class="catalog-list">
            <div class="handle">
            <input class="id-catalog" type="hidden" value="'.$category[0].'" />
                <span class="name-catalog">'.$category[1].'</span>
                <div class="action">
                    <div class="action-items delete">';
                    ?>
                    <a href="<?php echo _WEB_ROOT?>/adm/category/deleteCategory?idDelete=<?php echo $category[0]; ?>" name="deleteCatalog">
                    <ion-icon name="trash-outline"></ion-icon>
                    </a> 
                    <?php
                    echo '</div>
                    <div class="action-items change">
                        <ion-icon name="open-outline"></ion-icon>
                    </div>
                    <div class="action-items see-category">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="category-list">
            ';
               foreach($categoryList['items_'.$key] as $value){
                echo ' <div class="category-items">
                    <input type="hidden" class="id-category-items" value="'.$value[0].'" />
                    <span class="name-category" >'.$value[1].'</span>

                    <div class="action">
                        <div class="action-items change">
                            <ion-icon name="open-outline"></ion-icon>
                        </div>
                        <div class="action-items">
                        ';
                        ?>
                        <a href="<?php echo _WEB_ROOT?>/adm/category/deleteCategory?idDeleteCategory=<?php echo $value[0]; ?>" name="deleteCatalog">
                        <ion-icon name="trash-outline"></ion-icon>
                        </a> 
                        <?php
                    echo '</div>
                    </div>
                 </div>';
               }
                echo '<div class="category-items last add-category-items">
                    <span></span>
                    <ion-icon name="add-circle-outline"></ion-icon>
                </div>
            </div>
        </div>';
        }    
        ?>
    </div>
    <div class="add-catalog">
               <span></span>
               <ion-icon name="add-circle-outline"></ion-icon>
    </div>
</form>

<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/home.js"></script>
<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/category.js"></script>
<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/categoryItem.js"></script>