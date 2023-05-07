import { useState, useEffect } from "react";
import Navbar from "../components/navbar";
import Search from "../components/search";
import Table from "../components/table";
import "./App.css";

function App() {
  const [trains, setTrains] = useState([]);
  const [findData, setFindData] = useState("");

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      const response = await fetch("http://localhost:8000/api/trains");
      const dataJson = await response.json();

      if (!response.ok) {
        console.log(response.statusText);
      }

      const { data } = dataJson;
      setTrains(data);
    } catch (error) {
      console.log(error.message);
    }
  };

  const handleFind = () => {
    if (findData.trim() !== "") {
      const foundTrains = trains.filter((train) =>
        train.name.toLowerCase().includes(findData.toLocaleLowerCase())
      );

      setTrains(foundTrains);
    } else {
      fetchData();
    }
  };

  return (
    <div className="App">
      <Navbar />

      <div className="containerr">
        <div className="wallpaper">
          <div className="category">
            <h1>Indonesia Railway Station</h1>
            <Search actionClick={handleFind} actionChange={setFindData} />
          </div>
        </div>
        <div className="detail">
          <div id="table">
            <Table data={trains} />
          </div>
          <nav aria-label="Page navigation example" className="pagination">
            <ul className="pagination">
              <li className="page-item">
                <a className="page-link" href="#1">
                  Previous
                </a>
              </li>
              <li className="page-item">
                <a className="page-link" href="#2">
                  1
                </a>
              </li>
              <li className="page-item">
                <a className="page-link" href="#3">
                  2
                </a>
              </li>
              <li className="page-item">
                <a className="page-link" href="#4">
                  3
                </a>
              </li>
              <li className="page-item">
                <a className="page-link" href="#5">
                  Next
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  );
}

export default App;
