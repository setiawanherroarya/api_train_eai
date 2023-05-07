import React from "react";

const Search = ({ actionClick, actionChange }) => {
  return (
    <div className="search-bar">
      <div className="input-search">
        <input
          type="text"
          name="search"
          placeholder="Search..."
          onChange={(e) => actionChange(e.target.value)}
        />
      </div>
      <button className="search-button" onClick={actionClick}>
        <i className="bx bx-search" />
      </button>
    </div>
  );
};

export default Search;
