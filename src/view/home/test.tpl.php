

<button class="btn btn-primary" id="getAdminButton">Get Admin</button>
<p>Admin Address: <span id="adminAddress">N/A</span></p>

<script>
// get admin line 24
    document.addEventListener("DOMContentLoaded", async () => {
        // Check if MetaMask is available
        if (typeof window.ethereum !== "undefined") {
            const web3 = new Web3(window.ethereum);

            // Request account access if needed
            try {
                await window.ethereum.request({ method: "eth_requestAccounts" });

                // Create the contract instance
                const contract = new web3.eth.Contract(contractABI, contractAddress);

                // Set up the button click listener
                document.getElementById("getAdminButton").addEventListener("click", async () => {
                    try {
                        // Call the admin function from the contract
                        const adminAddress = await contract.methods.admin().call();
                        // Display the admin address in the UI + (return whatever you want as a "call" after the mothod)
                        document.getElementById("adminAddress").textContent = adminAddress;
                    } catch (error) {
                        console.error("Error fetching admin address:", error);
                        alert("Failed to fetch admin address. Check the console for details.");
                    }
                });
            } catch (error) {
                console.error("User denied account access:", error);
                alert("Please allow MetaMask access to use this feature.");
            }
        } else {
            alert("MetaMask is not detected. Please install MetaMask to use this feature.");
        }
    });
</script>