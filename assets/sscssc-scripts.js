jQuery(document).ready(function($) {
    const sscssFilesField = document.getElementById('sscss-files-field');

    if (sscssFilesField) {
        const sscssFilesFieldTbody = sscssFilesField.querySelector('tbody');

        // Add file group
        document.getElementById('sscss-add-file-group').addEventListener('click', function() {
            sscssFilesFieldTbody.insertAdjacentHTML('beforeend', `
            <tr>
                <td><strong class="sscss-remove-file-group">${SscssCSettingsObject.removeFileGroupText}</strong></td>
                <td>
                    <div class="sscss-input-file-wrapper">
                        <input type="text" value="">
                        <span class="sscss-remove-input">X</span>
                    </div>
                    <h4 class="sscss-add-input-file">${SscssCSettingsObject.addInputFileText}</h4>
                </td>
                <td><input type="text" value=""></td>
            </tr>
            `);
        });

        sscssFilesField.addEventListener('click', function(event) {
            // Remove file group
            if (event.target.classList.contains('sscss-remove-file-group')) {
                event.target.closest('tr').remove();
            }

            // Add input file
            if (event.target.classList.contains('sscss-add-input-file')) {
                const newInputWrapper = document.createElement('div');
                newInputWrapper.classList.add('sscss-input-file-wrapper');
                newInputWrapper.innerHTML = `
                <input type="text" value="">
                <span class="sscss-remove-input">X</span>
                `;
                event.target.closest('td').insertBefore(newInputWrapper, event.target);
            }

            // Remove input file
            if (event.target.classList.contains('sscss-remove-input')) {
                event.target.closest('.sscss-input-file-wrapper').remove();
            }
        });

        // Save data
        const sscssFilesForm = document.getElementById('sscss-files-form');
        const sscsscFilesToCompileField = document.getElementById('sscssc-files-to-compile');
        sscssFilesForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const data = [];

            sscssFilesFieldTbody.querySelectorAll('tr').forEach(function(row) {
                const fileGroup = {input : [], output : ''};
                
                const fileInput = [];
                row.querySelectorAll('td:nth-of-type(2) input').forEach(function(inputFile) {
                    fileInput.push({
                        'value'             :   inputFile.value,
                        'lastCompiledDate'  :   0
                    })
                });
                fileGroup.input = fileInput;

                fileGroup.output = row.querySelector('td:nth-of-type(3) input').value;
                
                data.push(fileGroup);
            });

            sscsscFilesToCompileField.value = JSON.stringify(data);

            sscssFilesForm.submit();
        });

        // Display saved data
        if (sscsscFilesToCompileField.value) {
            JSON.parse(sscsscFilesToCompileField.value).forEach(function(fileGroup) {
                // Get inputfields
                let inputFields = '';
                fileGroup.input.forEach(function(inputField) {
                    inputFields += `<div class="sscss-input-file-wrapper">
                        <input type="text" value="${inputField.value}">
                        <span class="sscss-remove-input">X</span>
                    </div>`
                });
                
                // Create file group
                sscssFilesFieldTbody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td><strong class="sscss-remove-file-group">${SscssCSettingsObject.removeFileGroupText}</strong></td>
                    <td>
                        ${inputFields}
                        <h4 class="sscss-add-input-file">${SscssCSettingsObject.addInputFileText}</h4>
                    </td>
                    <td><input type="text" value="${fileGroup.output}"></td>
                </tr>
                `);
            })
        }
    }
});
