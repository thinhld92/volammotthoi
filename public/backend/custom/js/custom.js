(function () {
  // Comment editor
  const commentEditor = document.querySelector('.comment-editor');
  if (commentEditor) {
    new Quill(commentEditor, {
      modules: {
        toolbar: '.comment-toolbar'
      },
      placeholder: 'Category Description',
      theme: 'snow'
    });
  }
})();

// function handleClick(cb) {
//   cb.value = cb.checked ? 1 : 0;
//   console.log(cb.value);
// }