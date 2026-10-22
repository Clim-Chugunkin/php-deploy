document.addEventListener('DOMContentLoaded', function () {
    const btnAdd = document.getElementById('btn-add');
    const container = document.getElementById('specs');
    let rowIndex = container.querySelectorAll('.spec').length;

    btnAdd.addEventListener('click', function(){
        const newRow = document.createElement('div');
        newRow.className = "spec";
        newRow.innerHTML = `
             <input type="text" name="specs[${rowIndex}][key]" placeholder="Введите характеристику">
            <input type="text" name="specs[${rowIndex}][value]" placeholder="Введите значение">
        `;
        container.appendChild(newRow);
        rowIndex++;
    });

    
});

// Находим элементы на странице
const imageInput = document.getElementById('watch-image');
const imagePreview = document.getElementById('image-preview');

// Следим за тем, когда менеджер выберет файл
if (imageInput && imagePreview) {
    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            // Когда файл прочитан — вставляем его в src и показываем картинку
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            // Если пользователь отменил выбор — скрываем превью обратно
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
}