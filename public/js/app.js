
function save(type_id, csrf_token){
    let url = "/add-remove-type";
    let formData = new FormData();
    formData.append('type_id', type_id);

    fetch(url, { method: 'POST', body: formData, headers: {
            'X-CSRF-TOKEN': csrf_token
        } })
        .then(function (response) {
            return response.text();
        }).then(function (body) {
            console.log(body);
            loadTypes();
    });

}

async function getSubtypes(){
    let type_id = document.getElementById('selectType').value;
    let response = await fetch('/get-subtypes/'+type_id);
    let subtypes = await response.json();

    let subtypeOptions = "";
    subtypes.forEach( (subtype) => {
        subtypeOptions += `<option value="${subtype.id}" >${subtype.name}</option>`;
    });

    document.getElementById('selectSubtype').innerHTML = subtypeOptions;
}

async function loadTypes(){
    let response = await fetch("/get-types-for-user");
    let types = await response.json();

    let typeOptions = "<option value=\"\">- odaberite tip -</option>";
    types.forEach( (type) => {
        typeOptions += `<option value="${type.id}" >${type.name}</option>`;
    });

    document.getElementById('selectType').innerHTML = typeOptions;
}

async function showAttachments(expense_id){
    let response = await fetch("/expense/"+expense_id+"/attachments");
    let responseJSON = await response.json();

    let tableBody = "";
    responseJSON.attachments.forEach((attachment) => {
        let downloadBtn = `<a download href="${attachment.download_file_path}" class="btn btn-sm btn-primary" >preuzmi</a>`;
        tableBody += `<tr><td>${attachment.description}</td><td>${downloadBtn}</td></tr>`;
    });

    document.getElementById("attachmentsTableBody").innerHTML = tableBody;
    let attachmentModal = new bootstrap.Modal(document.getElementById('attachmentsModal'));
    attachmentModal.show();
}

function addNewAttachment(expense_id){
    document.getElementById("newAttachmentExpenseId").value = expense_id;
    let newAttachmentModal = new bootstrap.Modal(document.getElementById('newAttachmentModal'));
    newAttachmentModal.show();
}

function changeLimit(){
    document.getElementById("selectLimitForm").submit();
}

function showLogoutMessage(){
    document.getElementById("logout_button").innerHTML = "Odjava";
}

function showUserName(userName){
    document.getElementById("logout_button").innerHTML = userName;
}
