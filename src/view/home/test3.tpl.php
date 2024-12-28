<form id="transferOwnershipForm">
   <!-- <label for="propertyId">Property ID:</label>
    <input type="text" id="propertyId" name="propertyId" required><br><br>

    <label for="newOwner">New Owner Address:</label>
    <input type="text" id="newOwner" name="newOwner" required><br><br>

    <button type="submit">Transfer Ownership</button> -->



    <div class="mb-3">
        <label for="propertyId" class="form-label">Property ID</label>
        <input type="text" class="form-control" id="propertyId" aria-describedby="propertyIdHelp" required>
        <div id="propertyIdHelp" class="form-text">Enter The ID for the property</div>
    </div>

    <div class="mb-3">
        <label for="newOwner" class="form-label">New Owner Address</label>
        <input type="text" class="form-control" id="newOwner" aria-describedby="newOwnerHelp" required>
        <div id="newOwnerdHelp" class="form-text">Enter The new owner ID</div>
    </div>

    <button type="submit" class="btn btn-primary">Transfer Ownership</button>




</form>


<p id="status"></p>

<script>


        let web3;
        let contract;

        window.addEventListener('load', async () => {
            if (window.ethereum) {
            web3 = new Web3(window.ethereum);
            await window.ethereum.request({ method: 'eth_requestAccounts' });

            const accounts = await web3.eth.getAccounts();
            const account = accounts[0];

            contract = new web3.eth.Contract(contractABI, contractAddress);
            document.getElementById("status").innerText = "Connected as: " + account;
        } else {
            document.getElementById("status").innerText = "Please install MetaMask!";
        }
        });

        document.getElementById('transferOwnershipForm').addEventListener('submit', async (event) => {
            event.preventDefault();

            const propertyId = document.getElementById('propertyId').value;
            const newOwner = document.getElementById('newOwner').value;

            try {
            const accounts = await web3.eth.getAccounts();
            await contract.methods.transferOwnership(propertyId, newOwner).send({ from: accounts[0] });
            document.getElementById("status").innerText = "Ownership transferred successfully!";
        } catch (error) {
            console.error(error);
            document.getElementById("status").innerText = "Error during ownership transfer.";
        }
        });
</script>