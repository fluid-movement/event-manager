import { MagnifyingGlassIcon } from "@radix-ui/react-icons";
import {
    Box,
    Flex,
    TextField,
    Button,
    Text,
    Separator,
    Grid,
} from "@radix-ui/themes";
import * as Collapsible from "@radix-ui/react-collapsible";

type FilterProps = {
    onSearch: (value: string) => void;
    onFilter: (value: string) => void;
    filter: string;
};

const Filter = ({ onSearch, onFilter, filter }: FilterProps) => {
    const handleOnFilter = (value: string) => {
        if (filter === value) {
            onFilter("");
            return;
        }

        onFilter(value);
    };

    return (
        <>
            <Grid
                gap="3"
                justify="between"
                align="center"
                columns={{ initial: "1", sm: "3" }}
                width="100%"
            >
                <Box className="flex">
                    <TextField.Root className="w-full sm:w-auto">
                        <TextField.Slot>
                            <MagnifyingGlassIcon height="16" width="16" />
                        </TextField.Slot>
                        <TextField.Input
                            placeholder="Username"
                            type="name"
                            name="name"
                            size="3"
                            onChange={(e) => onSearch(e.target.value)}
                            autoComplete="name"
                        />
                    </TextField.Root>
                </Box>
                <Box className="flex gap-2 items-center justify-center">
                    <Separator size="4" />
                    <Text size="1" className="text-gray-9">
                        or
                    </Text>
                    <Separator size="4" />
                </Box>
                <Box className="flex gap-2 sm:justify-end">
                    <Button
                        variant={filter === "upcoming" ? "solid" : "soft"}
                        onClick={() => handleOnFilter("upcoming")}
                    >
                        Upcoming
                    </Button>
                    <Button
                        variant={filter === "past" ? "solid" : "soft"}
                        onClick={() => handleOnFilter("past")}
                    >
                        2024
                    </Button>
                    <Button
                        variant={filter === "past" ? "solid" : "soft"}
                        onClick={() => handleOnFilter("past")}
                    >
                        2023
                    </Button>
                </Box>
            </Grid>
            <Box className="flex justify-end">
                <Collapsible.Root className="flex justify-end items-end flex-col gap-2">
                    <Collapsible.Trigger>
                        <Text size="1" align="right">
                            + Show more...
                        </Text>
                    </Collapsible.Trigger>
                    <Collapsible.Content>
                        <Box className="flex gap-2 sm:justify-end">
                            <Button
                                variant="soft"
                                onClick={() => onFilter("free")}
                            >
                                Free
                            </Button>
                            <Button
                                variant="soft"
                                onClick={() => onFilter("paid")}
                            >
                                Paid
                            </Button>
                        </Box>
                    </Collapsible.Content>
                </Collapsible.Root>
            </Box>
        </>
    );
};

export default Filter;
