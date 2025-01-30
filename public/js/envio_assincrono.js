document.getElementById('uploadForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const progress = document.getElementById('progress');
    const status = document.getElementById('status');

    try {
        const response = await fetch('upload.php', {
            method: 'POST',
            body: formData,
        });

        const data = await response.json();
        
        if (data.redirect) {
            window.location.href = data.redirect;
        } else if (data.success) {
            status.textContent = 'Upload concluído com sucesso!';
            form.reset();
        } else {
            status.textContent = 'Erro: ' + (data.message || 'Erro desconhecido');
        }
    } catch (error) {
        status.textContent = 'Erro na comunicação com o servidor';
    }
});

// Progresso com Axios (opcional)
/*
const progressBar = document.getElementById('progress');
axios.post('upload.php', formData, {
    onUploadProgress: progressEvent => {
        const percent = Math.round((progressEvent.loaded / progressEvent.total) * 100);
        progressBar.value = percent;
    }
});
*/