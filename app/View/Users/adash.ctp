<div class="dash">
    <h2>Welcome to the Document Management Console</h2>
    <p>Site navigation is available using the above navigation bar.</p> 
    <p>User Data Analytics are available below:</p>
    <h3>Data Analytics</h3>
    <table>
        <thead>
            <tr>
                <th>Data Question</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Users</td>
                <td><?php echo $data["noUsers"]; ?></td>
            </tr>
            <tr>
                <td>Total Sector Groups</td>
                <td><?php echo $data["noGroups"]; ?></td>
            </tr>
            <tr>
                <td>Total Tags</td>
                <td><?php echo $data["noTags"]; ?></td>
            </tr>
        </tbody>
    </table>
</div>