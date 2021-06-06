let nbCartItems = document.getElementById('nb-cart-items');//图标购物车数字显示部分
let cartLink = document.getElementById('cart-link');//购物车链接
let btnBuy = document.getElementsByClassName('btn')[0];//商品处的购买按钮 ????????????????????????????只适合于单页单产品
let btnBuyS = document.getElementsByClassName('btn')[1];
let btnBuyD = document.getElementsByClassName('btn')[2];
let nbItems = 0; //应该是商品初始数量为0

//Objet cart创建购物车对象
const cart = {
  productList: [],//购物车中的产品名单
  getProductExist(product){
    let indexProductExist = -1;//先假设购物车中不存在此产品，-1这里表示不存在，没有这个产品的index
    //让选中的产品在购物车商品单中for...in循环对比，假如它的id和其中某个产品id相同，证明此产品存在，存在的身份就是它
    for(let p in this.productList){  //???for...of..
      if(this.productList[p].id == product.id){
        indexProductExist = p;  //这个产品的index就是p
      }
    }
     //返回结果此产品的index注意它有两种可能-1或者是p。此返回结果为下面的步骤作准备
    return indexProductExist;
  },

  //定义把商品加入购物车的函数方法 add les produit in panier
  addProduct(product){
    let indexProductExist = this.getProductExist(product);
    if(indexProductExist == -1){
      this.productList.push(product);
    } else {
      this.productList[indexProductExist].quantity += product.quantity;
    }
  },

  //商品总价
  getTotalPrice(){
    let total = 0;
    for(product of this.productList){
      total += product.price * product.quantity;
    }
    return total;//返回结果总计
  },
  //商品总数量
  getTotalQuantity(){
    let totalQuantity = 0;
    for(product of this.productList){
      totalQuantity += product.quantity;
    }
    return totalQuantity;
  }
}

//当页面完成加载，查看localStorage里是否存有数据，有的话提取它们同时转化为对象的键值对形式以利于读取。
window.addEventListener('load', function(){
  if(localStorage.getItem('cart') != null){
    let string = localStorage.getItem('cart')//localstorage只接受字符串形式
    cart.productList = JSON.parse(string);//用JSON把数据转为对象形式
   // cart.productList = JSON.parse(localStorage.getItem('cart'));
   console.log(cart);//不重要，可以省略
    nbCartItems.innerHTML = cart.getTotalQuantity();
    showCart();//显示购物车；定义于下面
  }
});

//给购买按钮添加监听动作
btnBuy.addEventListener('click', function(e){
  e.preventDefault();//取消之前设置的链接
  let title = document.getElementById('product-name');
  let price = document.getElementById('product-price');
  let quantity = document.getElementById('quantity');
  cart.addProduct(
    {
      id: this.getAttribute('data-product-id'),//购买按钮里面
      name: title.innerHTML,
      price: parseFloat(price.textContent),//改动 原来为 price: price.innerHTML,
      quantity: parseInt(quantity.value)//由于对象里显示的都是字符串形式，这里需要转变为数字，为其进行正常的数学运算作准备
    }
    );
  
    document.getElementsByClassName('dropdown-content')[0].style.display = 'none';  //隐藏购物车下的产品清单区域
    hideCart();//问号  定义在下面
    nbCartItems.textContent = cart.getTotalQuantity();//图标购物车数字显示部分
     //把数据存入localStorage并且同时转化为字符串形式以利于存贮，这样换页面后购物车数据不会消失
    localStorage.setItem('cart', JSON.stringify(cart.productList));
  });
  
  //定义产品清单显示函数
  function showCart(){
      //let nb = 0;
    for(product of cart.productList){
      let elem = document.createElement('div');
      elem.className = 'item-panier';
      elem.id= ''+product.id;

      //定义购物车中的产品图片 
      let picture = document.createElement('img');
      if(product.id == 'first'){
        picture.src = 'img/img1.png';
      }
      if(product.id == 'sencond'){
        picture.src = 'img/img2.png';
      }
      if(product.id == 'dulux'){
        picture.src = 'img/img3.png';
      }
      
      picture.className = 'miniature';
      elem.appendChild(picture);
      
      let divTextePanier = document.createElement('div');
      divTextePanier.className = 'texte-panier';
      
      let titleElem = document.createElement('h2');
      titleElem.className = 'title-small';
      titleElem.innerHTML = product.name;
      divTextePanier.appendChild(titleElem);
      
      let priceElem = document.createElement('p');
      priceElem.innerHTML = product.price+"€";
      divTextePanier.appendChild(priceElem);
      
      //此处可以为产品数量减少添加符号 减号
      /* let moin = document.createElement("span");
      moin.textContent = "-";
      moin.className = "réduire";
      moin.addEventListener('click', moinQ); //有两个函数需要定义
      divTextePanier.appendChild(moin); */


      let quantityElem = document.createElement('p');
      quantityElem.textContent = 'Quantité : ' + product.quantity;
      divTextePanier.appendChild(quantityElem);
      
      let deleteElem = document.createElement('span');
      deleteElem.className = 'delItem';
      deleteElem.innerHTML = '&times';
     // deleteElem.setAttribute('data-product-id', elem.id);//存在于另一个文件
      deleteElem.addEventListener('click', deleteCartItem);
      divTextePanier.appendChild(deleteElem);
      
      elem.appendChild(divTextePanier);
      
      document.getElementById('panier').appendChild(elem);
      document.getElementById('total').innerHTML = 'Total : ' + cart.getTotalPrice() + '€';
    }
  }
  
  /* 删除某个商品  方法一*/
  function deleteCartItem(e){
    console.log(e.target.parentNode.parentNode);
    let parent = e.target.parentNode.parentNode;
    for (let product in cart.productList){
      if(cart.productList[product].id == parent.id){
        cart.productList.splice(product, 1);
      }
    }
    nbCartItems.textContent = cart.getTotalQuantity();
    document.getElementById('total').innerHTML = 'Total : ' + cart.getTotalPrice() + '€';
    hideCart();
    showCart();
  }
  
  function hideCart(){
    let panier = document.getElementById('panier');
    while(panier.firstChild){
      panier.removeChild(panier.firstChild);
    }
  }


  /* 定义显示或隐藏购物车清单块的函数 */
  cartLink.addEventListener('click', function(e){
    e.preventDefault();
    hideCart();
    showCart();
    if(document.getElementsByClassName('dropdown-content')[0].style.display === 'none'){
      document.getElementsByClassName('dropdown-content')[0].style.display = 'block';
    } else {
      document.getElementsByClassName('dropdown-content')[0].style.display = 'none';
    }
  });



  //第二个按钮
  btnBuyS.addEventListener('click', function(e){
    e.preventDefault();//取消之前设置的链接
    let title = document.getElementById('product-name-plus');
    let price = document.getElementById('product-price-plus');
    let quantity = document.getElementById('quantity-plus');
    cart.addProduct(
      {
        id: this.getAttribute('data-product-id'),//购买按钮里面
        name: title.innerHTML,
        price: parseFloat(price.textContent),//改动 原来为 price: price.innerHTML,
        quantity: parseInt(quantity.value)//由于对象里显示的都是字符串形式，这里需要转变为数字，为其进行正常的数学运算作准备
      }
      );
    
      document.getElementsByClassName('dropdown-content')[0].style.display = 'none';  //隐藏购物车下的产品清单区域
      hideCart();//问号  定义在下面
      nbCartItems.textContent = cart.getTotalQuantity();//图标购物车数字显示部分
       //把数据存入localStorage并且同时转化为字符串形式以利于存贮，这样换页面后购物车数据不会消失
      localStorage.setItem('cart', JSON.stringify(cart.productList));
    });
    
     //第三个按钮
  btnBuyD.addEventListener('click', function(e){
    e.preventDefault();//取消之前设置的链接
    let title = document.getElementById('product-name-delux');
    let price = document.getElementById('product-price-delux');
    let quantity = document.getElementById('quantity-delux');
    cart.addProduct(
      {
        id: this.getAttribute('data-product-id'),//购买按钮里面
        name: title.innerHTML,
        price: parseFloat(price.textContent),//改动 原来为 price: price.innerHTML,
        quantity: parseInt(quantity.value)//由于对象里显示的都是字符串形式，这里需要转变为数字，为其进行正常的数学运算作准备
      }
      );
    
      document.getElementsByClassName('dropdown-content')[0].style.display = 'none';  //隐藏购物车下的产品清单区域
      hideCart();//问号  定义在下面
      nbCartItems.textContent = cart.getTotalQuantity();//图标购物车数字显示部分
       //把数据存入localStorage并且同时转化为字符串形式以利于存贮，这样换页面后购物车数据不会消失
      localStorage.setItem('cart', JSON.stringify(cart.productList));
    });