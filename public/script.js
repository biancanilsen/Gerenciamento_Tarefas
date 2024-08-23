const date = new Date()
date.setMinutes(date.getMinutes() - date.getTimezoneOffset())
const today = date.toISOString().split('T')[0]


function openCreateEditModal(id, description, dateTask) {
    const modal = document.querySelector('#modal-create-edit')
    const taskId = modal.querySelector('#form-id')
    const taskDescription = modal.querySelector('#form-description')
    const taskDeadline = modal.querySelector('#form-deadline')
    const submitBtn = modal.querySelector('#form-submit-btn')

    if (id != undefined) {
        taskId.value = id
        taskDescription.value = description
        taskDeadline.value = dateTask

        modal.action = `../includes/edit_task.php?id=${id}`
        submitBtn.textContent = "Editar"
        submitBtn.classList.add("edit-btn")
        submitBtn.classList.remove("create-btn")
    
    } else {
        taskId.value = ""
        taskDescription.value = ""
        taskDeadline.value = today

        modal.action = '../includes/create_task.php'
        submitBtn.textContent = "Criar"
        submitBtn.classList.add("create-btn")
        submitBtn.classList.remove("edit-btn")
    }

    modal.classList.remove("hidden")
}


function openDeleteModal(id, description) {
    const modal = document.querySelector('#modal-delete')
    const taskDescription = modal.querySelector('#task-description')

    taskDescription.textContent = description
    modal.action = `../includes/delete_task.php?id=${id}`

    modal.classList.remove('hidden')
}


function closeModal(action) {
    const modal = document.querySelector(`#modal-${action}`)
    modal.classList.add("fade-out")

    modal.addEventListener("animationend", () => {
        modal.classList.add("hidden")
        modal.classList.remove("fade-out")
    }, { once: true })
}