window.addEventListener('load', (event) => {
    $('.link-button').on('click', function (e) {
        window.location.href = e.currentTarget.dataset.link;
    });

    $('.delete-product-image-btn').on('click', deleteProductDetailEvent);
    $('.delete-product-package-btn').on('click', deleteProductDetailEvent);
    $('.add-new-image-and-thumb').on('click', addImageAndThumbnailElements);
    $('.add-new-product-package').on('click', addNewPackage);
});

function deleteProductDetailEvent(e) {
    let id = e.currentTarget.dataset.id;
    let link = e.currentTarget.dataset.link;
    let csrf = e.currentTarget.dataset.csrf;
    let name = e.currentTarget.dataset.name;

    deleteProductImageAndRemoveElement(link, csrf, id, name, deleteMessages);
}

function makeId(length) {
    let result = [];
    let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
        result.push(characters.charAt(Math.floor(Math.random() *
            charactersLength)));
    }
    return result.join('');
}

function selectRefresh(id) {
    console.log($('#' + id))
    $('#' + id).select2({
        tags: true,
        allowClear: true,
        width: '100%'
    });
}

function previewImages(imageInputId, imageTagId, isMultiple) {
    const fileInput = document.getElementById(imageInputId);
    const imageTag = document.getElementById(imageTagId);

    fileInput.addEventListener('change', function (e) {
        const files = fileInput.files;
        if (!isMultiple) {
            if (files.length === 1) {
                imageTag.src = URL.createObjectURL(files[0]);
            }
        } else {
            imageTag.empty();
            for (let i = 0; i < files.length; i++) {
                imageTag.append(`<img src=${URL.createObjectURL(files[i])} alt="preview image" style="max-height: 100px;> class='img-responsive'`)
            }
        }
    })
}

function addImageAndThumbnailElements() {
    let imgId1 = makeId(10);
    let imgId2 = makeId(10);
    let imageId = makeId(10);
    let thumbnailId = makeId(10);
    let id = makeId(3);
    $('#image-wrapper').append(`
<div id="image-wrapper-${id}">

<div class="flex flex-row" >
    <input type="hidden" value="${id}" name="image_ids[]">
   <div class="form-element w-1/2">
      <div class="w-100 py-2">
         <img id="${imgId1}" src="" alt="" class="img-responsive" style="max-height: 100px;">
      </div>
      <label for="${thumbnailId}">Thumbnail  <span class="text-danger">*</span> </label>
      <input type="file" multiple="" name="thumbnails[]" value="" required="" class="form-control " id="${thumbnailId}">
   </div>
   <div class="form-element w-1/2">
      <div class="w-100 py-2">
         <img id="${imgId2}" src="" alt="" class="img-responsive" style="max-height: 100px;">
      </div>
      <label for="${imageId}">Image  <span class="text-danger">*</span> </label>
      <input type="file" multiple="" name="images[]" value="" required="" class="form-control " id="${imageId}" placeholder="Please Fill The Form">
   </div>
</div>
<div class="form-element">
      <button type="button" data-id="${id}" data-name="image-wrapper-" class="button-error focus:outline-none delete-product-image-btn">${langAddNewImages}</button>
   </div>
   <hr>
   </div>
`);
    previewImages(imageId, imgId2, false)
    previewImages(thumbnailId, imgId1, false)

    let buttons = $('.delete-product-image-btn');
    buttons.off('click');
    buttons.on('click', deleteProductDetailEvent);

    Swal.fire(
        langSuccessPopUp['title'],
        langSuccessPopUp['description'],
        'success'
    )
}

function objectToOptions(object)
{
    return object.map(function(value, index) {
        return `<option value="${index}">${value}</option>`;
    }).join('')
}

function addNewPackage() {
    let amountId = makeId(10);
    let previewImageId = makeId(10);
    let imageId = makeId(10);
    let id = makeId(3);
    let selectId = makeId(3);

    $('#package-wrapper').append(`
        <div id="package-wrapper-${id}">
   <input type="hidden" value="1" name="package_id[]">
   <div class="form-element w-full">
      <label class="block" for="IovMh55MaKt3bBBO">Package  <span class="text-danger">*</span> </label>


      <select id="${selectId}" class="select2-area select2-hidden-accessible" name="packages[]" required>
         ${objectToOptions(packageTypeOptions)}
      </select>
   </div>
   <div class="flex flex-row">
      <div class="form-element w-full w-1/2">
         <div class="w-100">
            <img id="${previewImageId}" src="" alt="" class="img-responsive" style="max-height: 100px;">
         </div>
         <label for="${imageId}">Image  <span class="text-danger">*</span> </label>
         <input type="file" multiple="" name="package_images[]" value="" required="" class="form-control " id="${imageId}" placeholder="Please Fill The Form">
      </div>
      <div class="form-element w-full w-1/2">
         <label class="block" for="${amountId}">Amount </label>
         <input type="number" name="amounts[]" value="" class="form-control " id="${amountId}" placeholder="Please Enter Package Amount">
      </div>
   </div>
   <div class="form-element">
      <button type="button" data-id="${id}" data-name="package-wrapper-" class="button-error color-error focus:outline-none delete-product-package-btn">
      Delete Image
      </button>
   </div>
   <hr>
</div>
    `);

    previewImages(imageId, previewImageId, false);

    let buttons = $('.delete-product-package-btn');
    buttons.off('click');
    buttons.on('click', deleteProductDetailEvent);

    selectRefresh(selectId);

    Swal.fire(
        langSuccessPopUp['title'],
        langSuccessPopUp['description'],
        'success'
    )
}

function deleteProductImageAndRemoveElement(link, csrf, id, name, messages) {
    console.log($(`#${name + id}`))
    console.log((`#${name + id}`))
    Swal.fire({
        title: messages['title'],
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: messages['confirm'],
        denyButtonText: messages['cancel'],
    }).then((result) => {
        if (result.isConfirmed) {
            if (link) {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: {
                        _token: csrf,
                    },
                    success: function (result) {
                        if (+result.status === 200) {
                            $(`#${name + id}`).remove();
                        } else {
                            Swal.fire('Error', result.message, 'error')
                        }
                    }
                });
            } else {
                $(`#${name + id}`).remove();
            }
            Swal.fire(langSuccessPopUp['title'], '', 'success')
        }
    })
}
