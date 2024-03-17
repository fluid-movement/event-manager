import { Box, Card, Flex, Avatar, Text } from "@radix-ui/themes";
import React from "react";
import { Event } from "@/types/types";

type EventCardProps = {
    event: Event;
};

const EventCard = ({ event }: EventCardProps) => {
    return (
        <Box py="2" key={event.id}>
            <Card style={{ maxWidth: 480 }}>
                <Flex gap="3" align="center">
                    <Avatar
                        size="3"
                        radius="full"
                        fallback={event.name.charAt(0)}
                    />
                    <Box>
                        <Text as="div" size="2" weight="bold">
                            {event.name}
                        </Text>
                        <Text as="div" size="2" color="gray">
                            {new Date(event.start).toLocaleString()}
                        </Text>
                    </Box>
                </Flex>
            </Card>
        </Box>
    );
};

export default EventCard;
