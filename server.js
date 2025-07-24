const express = require('express');
const app = express();
const path = require('path');

app.use(express.static(path.join(__dirname, 'public')));

// Optional: route to your homepage
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'main.html'));
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
