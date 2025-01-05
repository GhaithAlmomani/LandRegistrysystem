<section>
    <div class="flex-container">

        <style>

            .flex-container {
                display: flex;
                justify-content: space-between;
                gap: 5rem;
                margin-bottom: 5rem;
            }

            .table-container {
                flex: 1;
                background-color: var(--white);
                border-radius: 1rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                padding: 2rem;
            }

            .submit-container {
                text-align: center;
                margin-top: 2rem;
            }

            /* Popup Styling */
            .popup {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }

            .popup-content {
                background-color: #fff;
                border-radius: 8px;
                padding: 2rem;
                text-align: center;
                max-width: 400px;
                width: 90%;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .popup h2 {
                font-size: 1.8rem;
                margin-bottom: 1rem;
            }

            .popup .tracking-number {
                font-size: 1.4rem;
                color: #333;
                font-weight: bold;
            }

            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 2rem;
                font-weight: bold;
                color: #333;
                cursor: pointer;
            }

            .close:hover {
                color: #f00;
            }
        </style>

        <div class="table-container">
            <h1 class="heading">Seller Information</h1>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
                <tr>
                    <td>Full name</td>
                    <td><input type="text" placeholder="Enter your full name" class="box" /></td>
                </tr>
                <tr>
                    <td>National ID</td>
                    <td><input type="email" placeholder="Enter your national ID" class="box" /></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="tel" placeholder="Enter your phone number" class="box" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" placeholder="Enter your address" class="box" /></td>
                </tr>
            </table>
        </div>

        <div class="table-container">
            <h1 class="heading">Buyer Information</h1>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
                <tr>
                    <td>Full name</td>
                    <td><input type="text" placeholder="Enter your full name" class="box" /></td>
                </tr>
                <tr>
                    <td>National ID</td>
                    <td><input type="email" placeholder="Enter your national ID" class="box" /></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="tel" placeholder="Enter your phone number" class="box" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" placeholder="Enter your address" class="box" /></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="submit-container">
        <button type="button" class="btn" onclick="generateTrackingNumber()">Submit</button>
    </div>

    <!-- Popup Modal -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Your Tracking Number</h2>
            <p style="color: #13653f;" id="tracking-number" class="tracking-number"></p>

            <h2>Please save the number</h2>
        </div>
    </div>

    <script>
        function generateTrackingNumber() {
            const trackingNumber = 'TRK-' + Math.random().toString(36).substr(2, 9).toUpperCase();
            document.getElementById('tracking-number').innerText = trackingNumber;
            document.getElementById('popup').style.display = 'flex'; // Use 'flex' to center the popup
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

</section>

