import {
    Box,
    Card,
    Flex,
    Avatar,
    Text,
    IconButton,
    Link,
} from "@radix-ui/themes";
import { Event } from "@/types/types";
import { ArrowRightIcon } from "@radix-ui/react-icons";

type EventCardProps = {
    event: Event;
};

const EventCard = ({ event }: EventCardProps) => {
    console.log(event);
    return (
        <Box py="2" key={event.id}>
            <Card>
                <Flex justify="between" align="center">
                    <Flex gap="4" align="center">
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
                    <Box>
                        <Text as="div" size="2" color="gray">
                            {event.city}
                        </Text>
                        <Text as="div" size="2" color="gray">
                            {event.country}
                        </Text>
                    </Box>
                    <Box className="flex items-end justify-end">
                        <Link href={event.link}>
                            <IconButton variant="soft" disabled={!event.link}>
                                <ArrowRightIcon />
                            </IconButton>
                        </Link>
                    </Box>
                </Flex>
            </Card>
        </Box>
    );
};

export default EventCard;
