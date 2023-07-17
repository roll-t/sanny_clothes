function handleCategoty(){
    const btnAdd=document.querySelector('.add-catalog')
    function showCategory(){
        const btn=document.querySelectorAll('.see-category')
        btn.forEach((items,index)=>{
            items.addEventListener('click',e=>{
                const categoryListActiving=document.querySelector('.category-list.active')
                const categoryList=items.parentElement.parentElement.parentElement.querySelector('.category-list')
                categoryList.classList.toggle('active')
                btnAdd.classList.toggle('active')
                    if (categoryListActiving){
                    categoryListActiving.classList.remove('active')
                }
            })
        })
    }
    showCategory()
    function addCatalog(){
        const bodyCatalog=document.querySelector('.menu-category')
        btnAdd.addEventListener('click',e=>{
            const wrap=document.createElement('div')
            const content=`
            <div class="handle">
            <input class="name-catalog-add" type="text" placeholder="Nhập tên nhóm danh mục" />
            <div class="action">
            <button class="btn-add-catalog">Thêm danh mục</button>
            </div>
        </div>
        <div class="category-list">
            <div class="category-items">
                <span> Áo 1</span>
                <div class="action">
                    <div class="action-items change">
                        <ion-icon name="open-outline"></ion-icon>
                    </div>
                    <div class="action-items delete">
                        <ion-icon name="trash-outline"></ion-icon>
                    </div>
                </div>
            </div>
    
            <div class="category-items last">
                <span></span>
                <ion-icon name="add-circle-outline"></ion-icon>
            </div>
    
        </div>
            `
            wrap.className='catalog-list';
            wrap.innerHTML=content;
            bodyCatalog.append(wrap);
            btnAdd.style.display='none'
            const catalogInput=document.querySelector('.name-catalog-add')
            const btnAddCatalog=document.querySelector('.btn-add-catalog')
            btnAddCatalog.addEventListener('click',e=>{
                if(catalogInput.value.trim()==""){
                    alert('Nhập  tên danh mục')
                    catalogInput.focus();
                }else{
                    document.querySelector('.post-data-categoty').onsubmit=function(){
                        return true
                    }
                }
            })  
        })
    }
    addCatalog()
}

handleCategoty()