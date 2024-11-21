function handleProfilePictureUpload(event) {
    const file = event.target.files[0];

    if (file) {
        const formData = new FormData();
        formData.append('profile_picture', file);

        fetch('/upload-profile-picture', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.querySelector('img').src = data.profile_picture_url; // Update the profile picture
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }
}
