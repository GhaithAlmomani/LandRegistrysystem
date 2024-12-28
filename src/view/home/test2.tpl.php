<form id="registerForm">
   <!-- <label for="id">Property ID:</label><br>
    <input type="text" id="id" required><br><br>

    <label for="owner">Owner Address:</label><br>
    <input type="text" id="owner" required><br><br>

    <label for="description">Description:</label><br>
    <input type="text" id="description" required><br><br>

    <label for="latitude">Latitude:</label><br>
    <input type="text" id="latitude" required><br><br>

    <label for="longitude">Longitude:</label><br>
    <input type="text" id="longitude" required><br><br>

    <button type="button" onclick="registerProperty()">Register Property</button> -->
</form>


<form id="registerForm">
    <div class="mb-3">
        <label for="id" class="form-label">Property ID</label>
        <input type="text" class="form-control" id="id" aria-describedby="idHelp" required>
        <div id="idHelp" class="form-text">Enter the property ID</div>
    </div>

    <div class="mb-3">
        <label for="owner" class="form-label">Owner ID</label>
        <input type="text" class="form-control" id="owner" aria-describedby="ownerHelp" required>
        <div id="ownerHelp" class="form-text">Enter the Owner address</div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" aria-describedby="descriptionHelp" required>
        <div id="descriptionHelp" class="form-text">Enter a description for the property</div>
    </div>

    <div class="mb-3">
        <label for="latitude" class="form-label">latitude address</label>
        <input type="text" class="form-control" id="latitude" aria-describedby="latitudeHelp" required>
        <div id="latitudeHelp" class="form-text">Enter the property latitude</div>
    </div>

    <div class="mb-3">
        <label for="longitude" class="form-label">longitude address</label>
        <input type="text" class="form-control" id="longitude" aria-describedby="longitudeHelp" required>
        <div id="longitudeHelp" class="form-text">Enter the property longitude</div>
    </div>

    <button type="button" class="btn btn-primary" onclick="registerProperty()">Register Property</button>
</form>


<script>


        let web3;
        let contract;

        // Initialize web3
        if (typeof window.ethereum !== 'undefined') {
            web3 = new Web3(window.ethereum);
            window.ethereum.enable();
        } else {
            alert('Please install MetaMask to use this feature.');
        }

        // Initialize contract
        contract = new web3.eth.Contract(contractABI, contractAddress);

        // Register property function
        async function registerProperty() {
            const id = document.getElementById('id').value;
            const owner = document.getElementById('owner').value;
            const description = document.getElementById('description').value;
            const latitude = document.getElementById('latitude').value;
            const longitude = document.getElementById('longitude').value;

            const accounts = await web3.eth.getAccounts();

            contract.methods.registerProperty(id, owner, description, latitude, longitude)
            .send({ from: accounts[0] })
            .on('transactionHash', function(hash) {
            alert(`Transaction sent: ${hash}`);
        })
            .on('receipt', function(receipt) {
            alert('Property registered successfully!');
            console.log(receipt);
        })
            .on('error', function(error) {
            alert('Error: ' + error.message);
            console.error(error);
        });
        }
</script>