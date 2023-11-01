import { Box, Typography, Button } from "@mui/material";
import Plus from "@mui/icons-material/PlusOne";

import React from "react";
import AddRating from "./AddRating.jsx";
import RatingsView from "./RatingsView.jsx";

export default function Rater({ setTotalRatings, totalRatings }) {
  const [username, setUsername] = React.useState("");
  const [addRating, setAddRating] = React.useState(false);
  const [rating, setRating] = React.useState(true);

  React.useEffect(() => {
    const data = localStorage.getItem("username");
    const ratings = localStorage.getItem("totalRatings");
    setTotalRatings(JSON.parse(ratings))
    setUsername(data);
  }, [totalRatings]);
  return (
    <h1>
      <>
        {rating ? (
          <Box>
            <Typography align="center" variant="h1" sx={{ marginTop: "100px" }}>
              Sonic<span style={{ color: "#FF5A5A" }}>Score</span>
            </Typography>
            <Typography align="center" fontSize={"120%"} m={1}>
              <span style={{ color: "#FF5A5A" }}>Welcome </span>
              {username}!
            </Typography>
            <Box textAlign={"center"}>
              <Button
                startIcon={<Plus />}
                align="center"
                onClick={() => {
                  setAddRating(true);
                  setRating(!rating);
                }}
                variant="conatined"
                sx={{ backgroundColor: "#7B61FF", color: "white" }}
              >
                Add a Rating!
              </Button>
            </Box>
            <RatingsView totalRatings={totalRatings} username={username} />
          </Box>
        ) : (
          addRating && (
            <AddRating
              username={username}
              setRating={setRating}
              setAddRating={setAddRating}
              setTotalRatings={setTotalRatings}
              totalRatings={totalRatings}
            />
          )
        )}
      </>
    </h1>
  );
}
