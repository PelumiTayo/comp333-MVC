import React from "react";
import {
  Grid,
  Box,
  Card,
  CardActions,
  CardContent,
  Button,
  Typography,
} from "@mui/material";

export default function RatingsView({ totalRatings, username }) {
  return (
    <Box align={"center"} sx={{ flexGrow: 1 }} m={3}>
      <Grid
        container
        spacing={{ xs: 2, md: 3 }}
        columns={{ xs: 4, sm: 8, md: 12 }}
      >
        {totalRatings.map((subArray, index) => (
          <Grid item xs={2} sm={4} md={4} key={index}>
            <Card sx={{ maxWidth: 345 }}>
              <CardContent>
                <Typography gutterBottom variant="h5" component="div">
                  ID: {subArray[0]}
                </Typography>
                <Typography>User: {subArray[1]}</Typography>
                <Typography>Artist: {subArray[3]}</Typography>
                <Typography>Song: {subArray[2]}</Typography>
                <Typography>Rating: {subArray[4]}</Typography>
              </CardContent>
              <Box sx={{ width:"fit-content"}}>
              {username === subArray[1] ? (
                <CardActions>
                  <Button size="small">View</Button>
                  <Button size="small">Update</Button>
                  <Button size="small">Delete</Button>
                  <Button size="small">Comment</Button>
                </CardActions>
              ) : (
                <CardActions>
                  <Button size="small">View</Button>
                  <Button size="small">Comment</Button>
                </CardActions>
              )}
              </Box>
            </Card>
          </Grid>
        ))}
      </Grid>
    </Box>
  );
}
