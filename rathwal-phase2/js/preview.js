function post(event)
{
    // Retrieve title and content from localStorage
    const title = localStorage.getItem('previewTitle');
    const content = localStorage.getItem('previewContent');

    // Populate hidden input fields with title and content values
    document.getElementById('hiddenTitle').value = title;
    document.getElementById('hiddenContent').value = content;

    localStorage.removeItem('previewTitle');
    localStorage.removeItem('previewContent');
}

document.getElementById("postButton").addEventListener('click', post);