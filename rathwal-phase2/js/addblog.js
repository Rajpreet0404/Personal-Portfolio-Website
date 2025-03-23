function getLocalStorage()
{
    // Retrieve title and content values from localStorage
    let title = localStorage.getItem('previewTitle');
    let content = localStorage.getItem('previewContent');

    // Check if title and content are not null
    if (title && content) 
    {
        // Populate the title and content fields
        document.getElementById('title').value = title;
        document.getElementById('content').value = content;
    }
}

// Function for 'Clear' button
function handleClearButtonClick(event) 
{
    // Prevent the default form submission behavior
    event.preventDefault();

    // Displays the alert box
    const confirmClear = window.confirm("Are you sure you want to clear the input fields?");

    // If user confirms, clear the input fields
    if (confirmClear) 
    {
        // Find the title and content input fields
        let title = document.getElementById('title');
        let content = document.getElementById('content');

        // Clear the input fields
        title.value = '';
        content.value = '';

        title.style.backgroundColor = '';
        content.style.backgroundColor = '';

        localStorage.removeItem('previewTitle');
        localStorage.removeItem('previewContent');
    }
    else 
    {
        console.error("Clear button not found");
    }
}

// Function for 'Post' button
function handleFormSubmission(event) 
{
    // Find the title and content input fields
    let title = document.getElementById('title');
    let content = document.getElementById('content');

    // Check if the title and content fields are empty
    if (title.value.trim() === '' || content.value.trim() === '') 
    {

        // Highlight the missing fields by changing their background color
        
        // Checks if the title field is empty
        if (title.value.trim() === '') 
        {
            title.style.backgroundColor = 'red';
        } 
        else 
        {
            title.style.backgroundColor = ''; // Reset border if title is not missing
        }

        // Checks if the content field is empty
        if (content.value.trim() === '') 
        {
            content.style.backgroundColor = 'red';
        } 
        else 
        {
            content.style.backgroundColor = ''; // Reset border if content is not missing
        }

        // Prevent the default form submission behavior
        event.preventDefault();
    }
}

function previewEvent(event)
{
    // Get the title and content values
    let title = document.getElementById("title").value;
    let content = document.getElementById("content").value;

    // Store the title and content values in localStorage
    localStorage.setItem('previewTitle', title);
    localStorage.setItem('previewContent', content);

    // Assign these values to the hidden input fields in the preview form
    document.getElementById("previewTitle").value = title;
    document.getElementById("previewContent").value = content;
}

function logout(event)
{
    localStorage.removeItem('previewTitle');
    localStorage.removeItem('previewContent');
}
// Add submit event listener to the form and specify the function to execute
document.querySelector('form').addEventListener('submit', handleFormSubmission);
document.getElementById('postButton').addEventListener('click', handleFormSubmission);
// Add click event listener to the clear button
document.getElementById('clearButton').addEventListener('click', handleClearButtonClick);

document.getElementById("previewButton").addEventListener("click", previewEvent);
document.getElementById("logoutLink").addEventListener("click", logout);
// Call the function to populate fields when the page loads
getLocalStorage();




