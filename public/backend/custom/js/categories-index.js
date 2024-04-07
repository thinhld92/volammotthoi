document.addEventListener('DOMContentLoaded', function(){
  document.getElementById('update-order-btn').addEventListener('click', function(){

    categories = document.getElementsByClassName('category-sort-order');
    
    if (categories.length > 0) {
      const form = document.getElementById('form-sort-categories-order');
      // const dataForm = new FormData(form);
      // console.log(dataForm);
      const order = {};
      for (let index = 0; index < categories.length; index++) {
        const element = categories[index];
        order[element.dataset.id] = element.value;
      }
      document.getElementById('input-sort-order').value = JSON.stringify(order);

      // dataForm.append('sort-order', JSON.stringify(order));
      form.submit();
    }
  })
});