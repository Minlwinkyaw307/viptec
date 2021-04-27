window.addEventListener('load', (event) => {
    $('.link-button').on('click', function (e) {
        window.location.href = e.currentTarget.dataset.link;
    });

    $('.delete-product-image-btn').on('click', deleteProductImageEvent);
});

function deleteProductImageEvent(e) {
    let id = e.currentTarget.dataset.id;
    let link = e.currentTarget.dataset.link;
    let csrf = e.currentTarget.dataset.csrf;

    deleteProductImageAndRemoveElement(link, csrf, id, deleteMessages);
}

function makeid(length) {
    let result           = [];
    let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result.push(characters.charAt(Math.floor(Math.random() *
            charactersLength)));
    }
    return result.join('');
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
    let imgId1 = makeid(10);
    let imgId2 = makeid(10);
    let imageId = makeid(10);
    let thumbnailId = makeid(10);
    let id = makeid(3);
    $('#image-wrapper').append(`<div id="image-wrapper-${id}">
   <div class="form-element w-full">
      <div class="w-100 py-2">
         <img id="${imgId1}" src="" alt="" class="img-responsive" style="max-height: 100px;">
      </div>
      <script>
         window.addEventListener('load', () => {
             previewImages("${thumbnailId}", "${imgId1}", false)
         })
      </script>
      <label for="${thumbnailId}">Thumbnail  <span class="text-danger">*</span> </label>
      <input type="file" multiple="" name="thumbnails[]" value="" required="" class="form-control " id="${thumbnailId}">
   </div>
   <div class="form-element w-full">
      <div class="w-100 py-2">
         <img id="${imgId2}" src="" alt="" class="img-responsive" style="max-height: 100px;">
      </div>
      <script>
         window.addEventListener('load', () => {
             previewImages("${imageId}", "${imgId2}", false)
         })
      </script>
      <label for="${imageId}">Image  <span class="text-danger">*</span> </label>
      <input type="file" multiple="" name="images[]" value="" required="" class="form-control " id="${imageId}" placeholder="Please Fill The Form">
   </div>
   <div class="form-element">
      <button type="button" data-id="${id}" class="button-error focus:outline-none delete-product-image-btn">Create New Item</button>
   </div>
   <hr>
</div>`);
    let buttons = $('.delete-product-image-btn');
    buttons.off('click');
    buttons.on('click', deleteProductImageEvent);
}

function deleteProductImageAndRemoveElement(link, csrf, id, messages) {
    Swal.fire({
        title: messages['title'],
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: messages['confirm'],
        denyButtonText: messages['cancel'],
    }).then((result) => {
        if (result.isConfirmed) {
            if(link) {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: {
                        _token: csrf,
                    },
                    success: function(result) {
                        if(result.result) {
                            $('#image-wrapper-' + id).remove();
                        }
                    }
                });
            } else {
                if(result.result) {
                    $('#image-wrapper-' + id).remove();
                }
            }

            Swal.fire('Saved!', '', 'success')
        }
    })
}
