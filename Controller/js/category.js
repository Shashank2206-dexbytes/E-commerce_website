document.querySelectorAll('.view-btn').forEach(button => {
    button.addEventListener('click', event => {
        const categoryId = button.getAttribute('data-category-id');
        const categoryName = button.getAttribute('data-category-name');
        const categoryDescription = button.getAttribute('data-category-description');
        const categoryImagePath = button.getAttribute('data-category-path');
        const categoryParent = button.getAttribute('data-category-parent');

        const categoryIdPlaceholder = document.getElementById('category-id-placeholder');
        categoryIdPlaceholder.textContent = categoryId;
        categoryIdPlaceholder.style.display = 'inline';

        document.getElementById('categoryname').textContent = categoryName;
        document.getElementById('category-description').textContent = categoryDescription;
        document.getElementById('category-image').src = categoryImagePath;
        document.getElementById('category-parent').textContent = categoryParent;
    });
});